#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <signal.h>

void child_handler(int signum) { printf("Child process received SIGUSR2 signal\n"); }

void parent_handler(int signum)
{
    printf("Parent process received SIGUSR1 signal\n");

    pid_t child_pid = getpid() + 1;
    if (kill(child_pid, SIGUSR2) != 0)
    {
        perror("kill");
        exit(1);
    }
}

int main()
{
    pid_t pid;

    signal(SIGUSR1, parent_handler);
    signal(SIGUSR2, child_handler);

    pid = fork();

    if (pid == 0)
    {
        if (kill(getppid(), SIGUSR1) != 0)
        {
            perror("kill");
            exit(1);
        }
        sleep(1);
        exit(0);
    }
    else if (pid > 0)
    {
        printf("Parent process waiting for child with PID %d\n", pid);
        wait(NULL);
    }
    else
    {
        perror("fork");
        exit(1);
    }

    return 0;
}
