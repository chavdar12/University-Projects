#include <stdio.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/wait.h>

int main()
{
    pid_t pid = fork();
    if (pid == 0)
    {
        char *argv[] = {"./helloworld"};
        execvp(argv[0], argv);
    }
    else
    {
        wait(NULL);
        printf("Child Complete \n");
    }
    return 0;
}
