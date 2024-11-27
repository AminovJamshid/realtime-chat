<template>
  <span v-html="iconSvg"></span>
</template>

<script setup>
  import feather from "feather-icons";
  import {computed} from "vue";

  const props = defineProps({
    name: {
      type: String,
      required: true,
    },
    size: {
      type: Number,
      default: 24,
    },
    color: {
      type: String,
      default: "currentColor",
    },
  });

  const iconSvg = computed(() => {
    return feather.icons[props.name]?.toSvg({
      width: props.size,
      height: props.size,
      color: props.color,
    });
  });
</script>

<style scoped>

</style>