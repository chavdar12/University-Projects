#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/wait.h>

int main()
{
    pid_t pid;

    for (int i = 0; i < 5; i++)
    {
        pid = fork();

        if (pid == -1)
        {
            perror("fork");
            exit(1);
        }
        else if (pid == 0)
        {
            // child process
            printf("%s process (PID=%d) created by parent process (PPID=%d)\n", i > 0 ? "Child" : "Parent", getpid(), getppid());
            break; // exit the loop
        }

        // parent process
        printf("Parent process (PID=%d) created child process (PID=%d)\n", getpid(), pid);
    }

    // only the parent process gets here
    wait(NULL); // wait for all child processes to exit
    printf("Parent process (PID=%d) exiting\n", getpid());
    exit(0);
}
