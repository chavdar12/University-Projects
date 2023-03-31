#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <fcntl.h>
#include <sys/stat.h>
#include <sys/types.h>
#include <string.h>

#define PIPE_NAME "my_pipe"

int main()
{
    int pipe_fd;
    int buffer[10];

    // Open the named pipe for writing
    pipe_fd = open("client2_pipe", O_WRONLY);

    // Write 10 numbers to the pipe
    for (int i = 0; i < 10; i++)
    {
        buffer[i] = i + 10;
        write(pipe_fd, &buffer[i], sizeof(int));
    }

    // Close the pipe
    close(pipe_fd);

    return 0;
}
