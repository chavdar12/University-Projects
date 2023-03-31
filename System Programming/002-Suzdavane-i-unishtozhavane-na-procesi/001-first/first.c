#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/wait.h>

int main()
{
    pid_t pid = fork();
    if (pid == 0)
    {
        printf("Child process: %d is created by parent process: %d \r \n", getpid(), getppid());
        exit(0);
    }
    else if (pid > 0)
    {
        wait(NULL);
        printf("Child process: %d is %s by parent process: %d \r \n", pid, pid > 0 ? "terminated" : "failed to terminate", getpid());
        system("ps -o pid,ppid,stat,cmd");
    }
    else
    {
        printf("Fork failed \r \n");
    }
    return 0;
}
