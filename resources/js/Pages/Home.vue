<template>
    <h1>Testing the welcome page made by {{ name }}</h1>

    <p>In this series, we will use the following framework: </p>
    <ul>
        <li v-for="framework of  frameworks" v-text="framework" :key="framework">

        </li>
    </ul>
</template>
<script>
export default {
    props: {
        name: String,
        frameworks: Array,
    }
};
</script>