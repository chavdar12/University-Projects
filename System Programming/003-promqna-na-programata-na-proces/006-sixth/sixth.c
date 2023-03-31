#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/wait.h>

#define MAX_COMMAND_LENGTH 1024

int main()
{
    char command[MAX_COMMAND_LENGTH];
    pid_t pid;
    int status;

    while (1)
    {
        printf("Enter command: ");
        fgets(command, MAX_COMMAND_LENGTH, stdin);
        command[strcspn(command, "\n")] = '\0';
        pid = fork();
        if (pid == -1)
        {
            perror("fork");
            exit(1);
        }
        else if (pid == 0)
        {
            char *args[] = {"/bin/sh", "-c", command, NULL};
            execvp(args[0], args);
            perror("execvp");
            exit(1);
        }
        else
        {
            wait(&status);
        }
    }

    return 0;
}
