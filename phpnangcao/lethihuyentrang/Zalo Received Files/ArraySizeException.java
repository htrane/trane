package nth_05;

public class ArraySizeException extends NegativeArraySizeException {
    
    public ArraySizeException() {
        super();
    }

    public ArraySizeException(String msg) {
        super(msg);
    }
}