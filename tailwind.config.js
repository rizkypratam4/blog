const defaultTheme = require("tailwindcss/defaultTheme");

export default {
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            }
        }
    }
}