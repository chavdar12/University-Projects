#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <signal.h>

#define NUM_CHILDREN 5

void child_handler(int signum)
{
    printf("Child process with PID %d received SIGUSR2 signal\n", getpid());
    exit(0);
}

void parent_handler(int signum)
{
    printf("Parent process with PID %d received SIGUSR1 signal\n", getpid());
    kill(getpid() + 1, SIGUSR2);
}

int main()
{
    pid_t pid[NUM_CHILDREN];
    int i;

    // Register the signal handlers for SIGUSR1 and SIGUSR2
    signal(SIGUSR1, parent_handler);
    signal(SIGUSR2, child_handler);

    // Fork five child processes
    for (i = 0; i < NUM_CHILDREN; i++)
    {
        pid[i] = fork();
        if (pid[i] == 0)
        {
            // Child process: wait for a SIGUSR1 signal from the parent process
            pause();
            // Exit the child process
            exit(0);
        }
        else if (pid[i] < 0)
        {
            perror("fork");
            exit(1);
        }
    }

    // Parent process: send SIGUSR1 signals to all child processes
    for (i = 0; i < NUM_CHILDREN; i++)
    {
        kill(pid[i], SIGUSR1);
    }

    // Parent process: wait for all child processes to exit
    for (i = 0; i < NUM_CHILDREN; i++)
    {
        wait(NULL);
    }

    return 0;
}
