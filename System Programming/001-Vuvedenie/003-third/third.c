#include <stdio.h>
#include <stdlib.h>
#include <sys/utsname.h>

int main()
{
    struct utsname unameData;

    if (uname(&unameData) != 0)
    {
        perror("Error getting system information");
        exit(1);
    }

    printf("Operating System: %s\nVersion: %s\nDistribution: %s\n", unameData.sysname, unameData.release, unameData.version);

    return 0;
}
