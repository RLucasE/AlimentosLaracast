<script setup>
import Navbar from '@/components/Navbar.vue';
import Hero from '@/components/Hero.vue';
import HomeCards from './components/HomeCards.vue';
import JobListings from './components/JobListings.vue';
</script>

<template>
  <Navbar></Navbar>
  <Hero></Hero>
  <HomeCards></HomeCards>
  <JobListings :limit="3" :show-button=true></JobListings>
</template>