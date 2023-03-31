#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <fcntl.h>
#include <sys/stat.h>
#include <sys/types.h>

#define PIPE_NAME "/tmp/my_pipe"

int main()
{
    int pipe_fd;
    int data[10];
    int sorted_data[10];

    // Create the named pipe
    if (mkfifo(PIPE_NAME, 0666) == -1)
    {
        perror("mkfifo");
        exit(1);
    }

    // Open the named pipe for writing
    if ((pipe_fd = open(PIPE_NAME, O_WRONLY)) == -1)
    {
        perror("open");
        exit(1);
    }

    // Generate random data to send
    for (int i = 0; i < 10; i++)
    {
        data[i] = rand();
    }

    // Send the data to the second process
    if (write(pipe_fd, data, sizeof(data)) == -1)
    {
        perror("write");
        exit(1);
    }

    // Close the pipe
    close(pipe_fd);

    // Open the named pipe for reading
    if ((pipe_fd = open(PIPE_NAME, O_RDONLY)) == -1)
    {
        perror("open");
        exit(1);
    }

    // Read the sorted data from the second process
    if (read(pipe_fd, sorted_data, sizeof(sorted_data)) == -1)
    {
        perror("read");
        exit(1);
    }

    // Close the pipe
    close(pipe_fd);

    // Print the sorted data
    printf("Sorted data: ");
    for (int i = 0; i < 10; i++)
    {
        printf("%d ", sorted_data[i]);
    }
    printf("\n");

    // Remove the named pipe
    if (unlink(PIPE_NAME) == -1)
    {
        perror("unlink");
        exit(1);
    }

    return 0;
}
