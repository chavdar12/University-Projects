#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <fcntl.h>
#include <sys/stat.h>
#include <sys/types.h>

#define PIPE_NAME "/tmp/my_pipe"

// Comparison function for qsort
int cmpfunc(const void *a, const void *b)
{
    return (*(int *)a - *(int *)b);
}

int main()
{
    int pipe_fd;
    int data[10];

    // Open the named pipe for reading
    if ((pipe_fd = open(PIPE_NAME, O_RDONLY)) == -1)
    {
        perror("open");
        exit(1);
    }

    // Read the data from the first process
    if (read(pipe_fd, data, sizeof(data)) == -1)
    {
        perror("read");
        exit(1);
    }

    // Sort the data
    qsort(data, 10, sizeof(int), cmpfunc);

    // Close the pipe
    close(pipe_fd);

    // Open the named pipe for writing
    if ((pipe_fd = open(PIPE_NAME, O_WRONLY)) == -1)
    {
        perror("open");
        exit(1);
    }

    // Send the sorted data back to the first process
    if (write(pipe_fd, data, sizeof(data)) == -1)
    {
        perror("write");
        exit(1);
    }

    // Close the pipe
    close(pipe_fd);

    return 0;
}
