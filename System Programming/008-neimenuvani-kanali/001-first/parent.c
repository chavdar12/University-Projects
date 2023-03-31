#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/wait.h>

int main()
{
    int pid[3];
    int fd[3][2];
    int status;

    // Create the pipes and child processes
    for (int i = 0; i < 3; i++)
    {
        if (pipe(fd[i]) == -1)
        {
            perror("pipe");
            exit(EXIT_FAILURE);
        }

        pid[i] = fork();

        if (pid[i] == -1)
        {
            perror("fork");
            exit(EXIT_FAILURE);
        }
        else if (pid[i] == 0)
        {
            // Child process
            close(fd[i][0]); // Close the read end of the pipe

            // Send the child's PID to the parent process
            int child_pid = getpid();
            write(fd[i][1], &child_pid, sizeof(int));

            // Print the child's PID to the console
            printf("Child %d PID: %d\n", i, child_pid);

            close(fd[i][1]); // Close the write end of the pipe
            exit(EXIT_SUCCESS);
        }
        else
        {
            // Parent process
            close(fd[i][1]); // Close the write end of the pipe

            // Read the child's PID from the pipe
            int child_pid;
            read(fd[i][0], &child_pid, sizeof(int));
            printf("Received child %d PID: %d\n", i, child_pid);

            close(fd[i][0]); // Close the read end of the pipe
        }
    }

    // Wait for all child processes to finish
    for (int i = 0; i < 3; i++)
    {
        waitpid(pid[i], &status, 0);
    }

    return 0;
}
