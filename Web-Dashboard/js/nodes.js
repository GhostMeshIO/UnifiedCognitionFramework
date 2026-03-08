/**
 * Node click interactions
 */
document.querySelectorAll('.node-card').forEach(card => {
  card.addEventListener('click', () => {
    const id = card.dataset.id;
    // Placeholder – could show node details
    console.log('Node clicked:', id);
  });
});
