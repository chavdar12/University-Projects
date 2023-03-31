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

    // Set signal handlers for SIGUSR1 and SIGUSR2
    sigaction(SIGUSR1, &sa_usr1, NULL);
    sigaction(SIGUSR2, &sa_usr2, NULL);

    // Create child process
    if ((child_pid = fork()) == 0)
    {
        // Child process
        printf("Child sending SIGUSR1 signal to parent...\n");
        kill(getppid(), SIGUSR1);
        pause(); // Wait for SIGUSR2 signal from parent
        printf("Child exiting...\n");
        exit(0);
    }
    else if (child_pid < 0)
    {
        // Error handling for fork failure
        perror("fork");
        exit(1);
    }

    // Parent process
    pause(); // Wait for SIGUSR1 signal from child
    printf("Parent sending SIGUSR2 signal to child...\n");
    kill(child_pid, SIGUSR2);
    wait(NULL); // Wait for child process to terminate
    printf("Parent exiting...\n");
    return 0;
}
