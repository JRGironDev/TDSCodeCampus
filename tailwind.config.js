/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                redwood: "#A76D60",
                bloodred: "#601700",
                eerieblack: "#19231a",
                huntergreen: "#33673b",
            },
        },
    },
    plugins: [],
};
