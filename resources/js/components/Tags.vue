<template>
    <div>
        <div>
            <span v-for="tag in list" :key="`tag-${tag.id}`" class="badge badge-primary mr-1">{{ tag.name }}</span>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Tags',
    props: {
        list: Array,
    }
}
</script>

<style>

</style>