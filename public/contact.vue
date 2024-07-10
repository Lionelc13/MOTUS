<template>
    <div>
        <contact :userid="user.id" />
      <!-- Utilisez d'autres propriétés ici -->
    </div>
  </template>
  
  <script>
  export default {
    props: {
      userid: {
        type: String,
        required: true
      }
    }
  };
  </script>
