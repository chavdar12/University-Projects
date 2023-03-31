#include <stdio.h>
#include <signal.h>

void myhandler(int signo)
{
    printf("Beginning of handler\n");
    kill(getpid(), SIGUSR1);
    printf("End of handler\n");
}

int main()
{
    signal(SIGUSR1, myhandler);
    kill(getpid(), SIGUSR1);
    return 0;
}
