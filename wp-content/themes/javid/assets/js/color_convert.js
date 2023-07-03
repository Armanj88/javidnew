/*
* This code will convert the hex color code that user entered to rgb color
*/

function colorConvert(css_variable, opacity= 1) {
    const hexValue = getComputedStyle(document.documentElement).getPropertyValue(`${css_variable}`).trim();

    // Remove the '#' symbol from the hex value
    const hexColor = hexValue.slice(1);

    // Convert the hex color to RGB values
    const red = parseInt(hexColor.slice(0, 2), 16);
    const green = parseInt(hexColor.slice(2, 4), 16);
    const blue = parseInt(hexColor.slice(4, 6), 16);

    // Set the converted RGB value as a CSS variable
    document.documentElement.style.setProperty(`${css_variable}-rgb-${opacity}`, `rgba(${red} ${green} ${blue} / ${opacity}%)`);
}

colorConvert('--primary-color', 20);
colorConvert('--secondary-color', 40);
