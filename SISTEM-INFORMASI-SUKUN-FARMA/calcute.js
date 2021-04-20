calculate = (n) => {
    if (n == 0) {
        return 0
    } else {
        return calculate(n / 5) + n % 5
    }
}

console.log(calculate(2903))