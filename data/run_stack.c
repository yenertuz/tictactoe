#include <unistd.h>
#include <stdlib.h>
#include <stdio.h>
#include <fcntl.h>
#include <string.h>
# define PE(x) printf(x);printf("\n")

typedef struct	s_list
{
	char		board[10];
	struct s_list	*next;
}				t_list;

typedef struct	s_stack
{
	unsigned int	count;
	t_list			*head;
	t_list			*tail;
	int				fd;
}				t_stack;

t_stack	*start_stack(void)
{
	t_stack *new;

	new = malloc(sizeof(t_stack));
	new->count = 1;
	new->head = malloc(sizeof(t_list));
	new->tail = new->head;
	memset(new->head->board, 0, 10);
	strcpy(new->head->board, ".........");
	return (new);
}

char	get_status(char *s)
{
	if (strchr(s, '.') == 0)
		return ('T');
	// row 1
	if (s[0] == s[1] && s[1] == s[2] && s[0] != '.')
		return ('W');
	// row 2
	if (s[3] == s[4] && s[4] == s[5] && s[3] != '.')
		return ('W');
	// row 3
	if (s[6] == s[7] && s[7] == s[8] && s[6] != '.')
		return ('W');
	// column 1
	if (s[0] == s[3] && s[3] == s[6] && s[0] != '.')
		return ('W');
	// column 2
	if (s[1] == s[4] && s[4] == s[7] && s[1] != '.')
		return ('W');
	// column 3
	if (s[2] == s[5] && s[5] == s[8] && s[2] != '.')
		return ('W');
	// diagonal 1
	if (s[0] == s[4] && s[4] == s[8] && s[0] != '.')
		return ('W');
	// diagonal 2
	if (s[2] == s[4] && s[4] == s[6] && s[2] != '.')
		return ('W');
	return ('C');
}

void	add_to_stack(t_stack *stack, char *rev)
{
	stack->count++;
	stack->tail->next = malloc(sizeof(t_list));
	stack->tail = stack->tail->next;
	memset(stack->tail->board, 0, 10);
	strcpy(stack->tail->board, rev);
}

void	process_move(t_stack *stack, char *s, int i)
{
	char	new[10];
	char	rev[10];
	char	status;
	int		c;
	char	to_write[100];

	memset(to_write, 0, 100);
	bzero(new, 10); bzero(rev, 10);
	strcpy(new, s);
	new[i] = 'u';
	status = get_status(new);
	c = 0;
	while (new[c] != 0)
	{
		if (new[c] == 'u')
			rev[c] = 't';
		else if (new[c] == 't')
			rev[c] = 'u';
		else
			rev[c] = new[c];
		c++;
	}
	if (status == 'C')
		add_to_stack(stack, rev);
	sprintf(to_write, "%s\t%d\t%s\t%c\n", s, i, new, status);
	write(stack->fd, to_write, strlen(to_write));
}

void	process_board(t_stack *stack, char *s)
{
	t_list *next;
	int i = 0;

	while (s[i] != 0)
	{
		if (s[i] == '.')
		{
			process_move(stack, s, i);
		}
		i++;
	}
	stack->count--;
	next = stack->head->next;
	free(stack->head);
	stack->head = next;
}

int main(void)
{
	t_stack	*stack;
	int		fd;
	char	*s;

	system("rm -rf records; touch records; chmod 755 records");
	fd = open("records", O_RDWR | O_APPEND | O_CREAT);
	printf("%d\n", fd);
	stack = start_stack();
	stack->fd = fd;
	while (stack->count > 0)
	{
		system("clear");
		printf("STACK COUNT: %d\n", stack->count);
		s = stack->head->board;
		process_board(stack, s);
		printf("STACK COUNT: %d\n", stack->count);
	}
	free(stack);
	close(fd);
	return (0);
}