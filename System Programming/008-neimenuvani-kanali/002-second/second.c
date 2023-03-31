#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/wait.h>

int main()
{
    int pipefd[2], status;
    pid_t pid;

    pipe(pipefd);
    pid = fork();

    if (pid == 0)
    {
        // Child process for "ls -ls/|wc -l"
        close(pipefd[0]);
        dup2(pipefd[1], STDOUT_FILENO);
        execlp("ls", "ls", "-ls", "/", NULL);
        perror("execlp");
        exit(EXIT_FAILURE);
    }

    pipe(pipefd);
    pid = fork();

    if (pid == 0)
    {
        // Child process for "ls -la/|grep a | wc -l"
        close(pipefd[0]);
        dup2(pipefd[1], STDOUT_FILENO);
        execlp("ls", "ls", "-la", "/", NULL);
        perror("execlp");
        exit(EXIT_FAILURE);
    }

    pipe(pipefd);
    pid = fork();

    if (pid == 0)
    {
        // Child process for "ls -la/|grep a | wc -l"
        close(pipefd[1]);
        dup2(pipefd[0], STDIN_FILENO);
        execlp("grep", "grep", "a", NULL);
        perror("execlp");
        exit(EXIT_FAILURE);
    }

    close(pipefd[1]);
    int wc_result;
    read(pipefd[0], &wc_result, sizeof(wc_result));
    printf("Number of files in / directory: %d\n", wc_result);

    close(pipefd[0]);
    pipe(pipefd);

    pid = fork();

    if (pid == 0)
    {
        // Child process for "ls -la/|grep a | wc -l"
        close(pipefd[0]);
        dup2(pipefd[1], STDOUT_FILENO);
        execlp("ls", "ls", "-la", "/", NULL);
        perror("execlp");
        exit(EXIT_FAILURE);
    }

    close(pipefd[1]);
    pipe(pipefd);

    pid = fork();

    if (pid == 0)
    {
        // Child process for "ls -la/|grep a | wc -l"
        close(pipefd[1]);
        dup2(pipefd[0], STDIN_FILENO);
        execlp("grep", "grep", "a", NULL);
        perror("execlp");
        exit(EXIT_FAILURE);
    }

    close(pipefd[0]);
    int grep_result;
    read(pipefd[1], &grep_result, sizeof(grep_result));
    printf("Number of files with 'a' in their name in / directory: %d\n", grep_result);

    return 0;
}
