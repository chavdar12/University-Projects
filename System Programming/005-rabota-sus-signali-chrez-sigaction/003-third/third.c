#include <stdio.h>
#include <stdlib.h>
#include <signal.h>
#include <unistd.h>
#include <sys/wait.h>

void sigusr1_handler(int signum)
{
    printf("Parent received SIGUSR1 signal from child\n");
}

void sigusr2_handler(int signum)
{
    printf("Child received SIGUSR2 signal from parent\n");
}

int main()
{
    pid_t child_pid;
    struct sigaction sa_usr1 = {.sa_handler = sigusr1_handler};
    struct sigaction sa_usr2 = {.sa_handler = sigusr2_handler};
    int i;

    sigaction(SIGUSR1, &sa_usr1, NULL);
    sigaction(SIGUSR2, &sa_usr2, NULL);

    for (i = 0; i < 5; i++)
    {
        if ((child_pid = fork()) == 0)
        {
            kill(getppid(), SIGUSR1);
            pause();
            exit(0);
        }
        else if (child_pid < 0)
        {
            perror("fork");
            exit(1);
        }

        pause();
        kill(child_pid, SIGUSR2);
        wait(NULL);
    }

    printf("Parent exiting...\n");
    return 0;
}
