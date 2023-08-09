import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/*/*.blade.php",
        "./public/**",
        //  "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        require("@tailwindcss/forms")({
            strategy: "base", // only generate global styles
            strategy: "class", // only generate classes
        }),
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};
