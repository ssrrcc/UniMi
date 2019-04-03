package it.unimi.di.sweng.lab03;

public class IntegerList {

    private Element head;
    private Element tail;

    public IntegerList() {
        this.head = null;
        this.tail = null;
    }

    public IntegerList(String input) {
        this.head = null;
        this.tail = null;
        addString(input);
    }

    private void addString(String input) {
        for (int i = 0; i < input.length(); i++) {
            char c = input.charAt(i);
            checkChar(c);
        }
    }

    private void checkChar(char c) {
        if (c != ' ') {
            if(Character.isDigit(c)) {
                addLast(Character.getNumericValue(c));
            }
            else {
                throw new IllegalArgumentException("Not supported input format.");
            }
        }
    }

    @Override
    public String toString() {
        Element current;
        StringBuilder result= new StringBuilder();
        result.append("[");
        for (current= head; current!=null; current=current.next) {
            addSpace(result, current);
            result.append(current.value);
        }
        result.append("]");
        return result.toString();
    }

    private void addSpace(StringBuilder result, Element current) {
        if(current!=head)
            result.append(" ");
    }

    public void addLast(int last) {
        Element item=new Element();
        item.value=last;
        item.next=null;
        if(head==null){
            head=item;
        }else {
            tail.next=item;
        }
        tail=item;

    }

    private class Element {
        int value;
        Element next;
    }
}
