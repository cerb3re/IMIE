/*
 
 *  T.CHENIER @ 2018 - IMIE
 
 *  Binary tree structure of
 
 *  algo. exercices  
 
*/
#include <unistd.h>
#include <stdlib.h>

typedef struct s_list t_list;
struct  s_list {
    char    *str;
    t_list  *next;
};

t_list  *add_link(t_list *list, char *str) {
    t_list  *tmp;
    
    tmp = malloc(sizeof(t_list));
    
    if (tmp) {
        tmp->str    = str;
        tmp->next   = list;
    }
    
    return(tmp);
}

void    print_char(char c) {
    write(1, &c, 1);
}

void    put_string(char *str) {
    int i;
    
    i = 0;
    while(str[i]) {
        print_char(str[i]);
        i++;
    }  
}

void    print_list(t_list *list) {
    while(list) {
        put_string(list->str);
        list = list->next;
    }
}

int     main(void) {
    t_list  *list;
    
    list = NULL;
    list = add_link(list, "A\n");
    list = add_link(list, "B\n");
    list = add_link(list, "C\n");

    print_list(list);
    
    return (0);
}