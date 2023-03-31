#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <time.h>
#include <sys/stat.h>

#define MAX_DEPTH 2

void process_directory(const char *path, int depth, const char *position, void (*process_file)(const char *))
{
    if (depth > MAX_DEPTH)
    {
        return;
    }

    if (mkdir(path, 0755) == -1)
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
            process_file(filename);
        }
    }
    else if (depth == 1)
    {
        return;
    }
    else
    {
        process_directory("left", depth + 1, "left", process_file);
        process_directory("right", depth + 1, "right", process_file);
    }

    if (chdir("..") == -1)
    {
        perror("Error changing directory");
        exit(1);
    }
}

void read_file(const char *filename)
{
    FILE *fp = fopen(filename, "r");
    if (fp == NULL)
    {
        perror("Error opening file");
        exit(1);
    }
    char line[256];
    while (fgets(line, sizeof(line), fp))
    {
        printf("%s", line);
    }
    fclose(fp);
}

int main()
{
    srand(time(NULL));
    process_directory("root", 0, "root", read_file);
    return 0;
}
