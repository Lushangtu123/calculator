document.addEventListener('DOMContentLoaded', () => {
    const buttons = [
        '7', '8', '9', '/',
        '4', '5', '6', '*',
        '1', '2', '3', '-',
        '0', '.', '=', '+',
        'C'
    ];
    
    const display = document.getElementById('display');
    const container = document.querySelector('.calc-buttons');
    
    buttons.forEach(btn => {
        const button = document.createElement('button');
        button.textContent = btn;
        button.addEventListener('click', () => handleButton(btn));
        container.appendChild(button);
    });

    function handleButton(value) {
        switch(value) {
            case '=':
                try {
                    display.value = eval(display.value);
                } catch {
                    display.value = '错误';
                }
                break;
            case 'C':
                display.value = '';
                break;
            default:
                display.value += value;
        }
    }
});
