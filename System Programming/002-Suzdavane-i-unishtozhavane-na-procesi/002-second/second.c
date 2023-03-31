#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/wait.h>

int main()
{
    pid_t pid = fork();

    if (pid == -1)
    {
        perror("fork");
        exit(1);
    }
    else if (pid == 0)
    {
        printf("Child process (PID=%d) created\n", getpid());
        sleep(5);
        printf("Child process (PID=%d) exiting\n", getpid());
        exit(0);
    }
    else
    {
        printf("Parent process (PID=%d) created child process (PID=%d)\n", getpid(), pid);
        int status;
        wait(&status);
        printf("Parent process (PID=%d) received status %d from child process (PID=%d)\n", getpid(), status, (pid_t)(pid > 0 ? pid : -1));
        printf("Parent process (PID=%d) exiting\n", getpid());
        exit(0);
    }
}
