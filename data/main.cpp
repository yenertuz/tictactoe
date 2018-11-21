#include <iostream>
#include <fstream>
#include <list>
#include <mysql/mysql.h>
using namespace std;

void	process_next_element(list<string>& l, ofstream& fd)
{
	string new_s(l.front());

	
	l.pop_front();
}

int		main(void)
{
	ofstream fd;
	list<string> l = {"........."};

	system("rm -f records");
	fd.open("records");
	while (l.size() > 0)
	{
		process_next_element(l, fd);
		//system("clear");
		cout << "Stack size: " << l.size() << endl;
	}
	fd.close();
	return (0);
}