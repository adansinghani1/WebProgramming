
<script type = "text/javascript">
function fibonacci(num)
    {   
        if(num==1)
            return 0;
        if (num == 2)
            return 1;
        return fibonacci(num - 1) + fibonacci(num - 2);
    }
document.write("Fibonacci(5): "+fibonacci(5)+"<br>");
document.write("Fibonacci(8): "+fibonacci(8)+"<br>");
</script>