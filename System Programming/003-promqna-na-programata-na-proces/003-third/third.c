#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

int main()
{
    char *values[] = {"value1", "value2", "value3", "value4"};
    int num_values = sizeof(values) / sizeof(values[0]);

    for (int i = 0; i < num_values; i++)
    {
        pid_t pid = fork();
        if (pid == -1)
        {
            perror("Error forking process");
            exit(1);
        }
        else if (pid == 0)
        {
            char command[64];
            snprintf(command, sizeof(command), "./print_MYVAR.sh %s", values[i]);
            system(command);
            exit(0);
        }
    }

    return 0;
}
