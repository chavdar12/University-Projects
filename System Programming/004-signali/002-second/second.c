#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <signal.h>
#include <sys/wait.h>

void sigchld_handler(int signum)
{
    pid_t pid;
    int status;

    while ((pid = waitpid(-1, &status, WNOHANG)) > 0)
        printf("Child process with PID %d exited with status %d\n", pid, WEXITSTATUS(status));
}

int main()
{
    signal(SIGCHLD, sigchld_handler);

    if (fork() == 0)
    {
        sleep(3);
        exit(42);
    }

    printf("Parent process waiting for child with PID %d\n", pid);
    wait(NULL);

    return 0;
}
