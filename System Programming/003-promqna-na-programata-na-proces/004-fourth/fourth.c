#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <time.h>
#include <sys/stat.h>

#define MAX_DEPTH 2

void create_directory_tree(const char *path, int depth, const char *position)
{
    if (depth > MAX_DEPTH)
    {
        return;
    }

    char command[64];
    snprintf(command, sizeof(command), "mkdir %s", path);
    if (system(command) == -1)
    {
        perror("Error creating directory");
        exit(1);
    }

    if (chdir(path) == -1)
    {
        perror("Error changing directory");
        exit(1);
    }

    if (depth == 1 && (strcmp(position, "left") == 0 || strcmp(position, "right") == 0))
    {
        for (int i = 0; i < 2; i++)
        {
            char filename[64];
            snprintf(filename, sizeof(filename), "file%d.txt", i);
            FILE *fp = fopen(filename, "w");
            if (fp == NULL)
            {
                perror("Error creating file");
                exit(1);
            }
            fprintf(fp, "This is file %d in the %s directory.\n", i, position);
            fclose(fp);
        }
    }
    else if (depth == 1)
    {
        return;
    }
    else
    {
        create_directory_tree("left", depth + 1, "left");
        create_directory_tree("right", depth + 1, "right");
    }

    if (chdir("..") == -1)
    {
        perror("Error changing directory");
        exit(1);
    }
}

int main()
{
    srand(time(NULL));
    create_directory_tree("root", 0, "root");
    return 0;
}
