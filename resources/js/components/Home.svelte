<script>
  export let userid;
  export let usertype;
</script>

{#if usertype === 'teacher'}
  <teacher-home {userid} />
{:else}
  <student-home {userid} />
{/if}
