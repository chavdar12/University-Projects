#include <stdio.h>
#include <stdlib.h>
#include <signal.h>
#include <unistd.h>

void sigint_handler(int signum)
{
    printf("SIGINT signal caught!\n");
}

int main()
{
    signal(SIGINT, sigint_handler);
    printf("Sending SIGINT signal...\n");
    kill(getpid(), SIGINT);
    return 0;
}
