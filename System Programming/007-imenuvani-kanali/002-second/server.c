#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <fcntl.h>
#include <sys/stat.h>
#include <sys/types.h>

#define PIPE_NAME "my_pipe"

int main()
{
    int client1_fd, client2_fd;
    int num_read;
    int buffer[10];

    // Create the named pipes
    mkfifo("client1_pipe", 0666);
    mkfifo("client2_pipe", 0666);

    // Open the named pipes for reading
    client1_fd = open("client1_pipe", O_RDONLY);
    client2_fd = open("client2_pipe", O_RDONLY);

    // Read 10 numbers from each client and print them out
    printf("Numbers from client 1:\n");
    for (int i = 0; i < 10; i++)
    {
        if (read(client1_fd, &buffer[i], sizeof(int)) > 0)
        {
            printf("%d ", buffer[i]);
        }
    }
    printf("\n");

    printf("Numbers from client 2:\n");
    for (int i = 0; i < 10; i++)
    {
        if (read(client2_fd, &buffer[i], sizeof(int)) > 0)
        {
            printf("%d ", buffer[i]);
        }
    }
    printf("\n");

    // Close the named pipes
    close(client1_fd);
    close(client2_fd);

    // Remove the named pipes
    unlink("client1_pipe");
    unlink("client2_pipe");

    return 0;
}
