#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/wait.h>

int spawn(char *program, char **args)
{
    pid_t pid = vfork();
    if (pid == -1)
    {
        perror("vfork");
        exit(1);
    }
    else if (pid == 0)
    {
        execvp(program, args);
        perror("execvp");
        exit(1);
    }
    else
    {
        return pid;
    }
}

int main()
{
    char *args[] = {"/bin/ls", "-l", NULL};
    printf("New process created with PID=%d\n", spawn(args[0], args));
    return 0;
}
