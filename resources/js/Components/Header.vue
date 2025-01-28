<template>
    <Container>
        <div class="h-full flex justify-between items-center ">
            <div class="flex items-center space-x-3">
                <div>
                    <img :src="image" alt="Logo" class="w-10 h-10"/>
                </div>
                <div>
                    <p class="font-black text-lg uppercase">Cuprite</p>
                </div>
            </div>

            <ThemeToggle/>
        </div>
    </Container>
</template>

<script>
import Container from "./Container.vue";
import ThemeToggle from "@/js/Components/Layouts/ThemeToggle.vue";

export default {
    name: "Header",
    components: {ThemeToggle, Container},
    data() {
        return {
           image: new URL("@/images/logo.svg", import.meta.url).href,
        }
    }
};
</script>
