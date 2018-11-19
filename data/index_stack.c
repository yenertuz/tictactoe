#include <unistd.h>
#include <stdlib.h>
#include <stdio.h>
#include <fcntl.h>
#include <string.h>
#include <sys/stat.h>
# define PF(x) printf(x);printf("\n")

char	*get_file(void)
{
	struct stat st;
	unsigned int	size;
	char	*ret;
	int		fd;
	char	*ptr;
	int		next;
	
	stat("records", &st);
	size = st.st_size;
	ret = malloc(size + 1);
	ret[size] = 0;
	fd = open("records", O_RDONLY);
	ptr = ret;
	next = 1;
	while (next)
	{
		next = read(fd, ptr, 2000);
		ptr += next;
	}
	close(fd);
	return (ret);
}

int	main(void)
{
	char	*file_s;

	file_s = get_file_s();
	write(1, file_s, strlen(file_s));
	free(file_s);
}