/**
 * Drag Module Forge – draggable intelligence modules
 */
(function() {
  'use strict';

  const grid = document.getElementById('module-grid');
  if (!grid) return;

  let draggingElement = null;
  let dragStartIndex = null;
  let dragOverIndex = null;

  // Save order to localStorage
  function saveOrder() {
    const modules = Array.from(grid.children).map(child => child.dataset.module);
    localStorage.setItem('psp144_module_order', JSON.stringify(modules));
  }

  // Load order from localStorage
  function loadOrder() {
    const saved = localStorage.getItem('psp144_module_order');
    if (!saved) return;
    try {
      const order = JSON.parse(saved);
      const children = Array.from(grid.children);
      // Reorder based on saved order
      order.forEach(id => {
        const element = children.find(child => child.dataset.module === id);
        if (element) grid.appendChild(element); // move to end
      });
    } catch (e) {}
  }

  // Drag and drop event handlers
  function handleDragStart(e) {
    draggingElement = this;
    dragStartIndex = Array.from(grid.children).indexOf(this);
    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/plain', this.dataset.module);
    this.classList.add('dragging');
  }

  function handleDragOver(e) {
    e.preventDefault();
    e.dataTransfer.dropEffect = 'move';
    const target = e.target.closest('.module-card');
    if (!target || target === draggingElement) return;
    const children = Array.from(grid.children);
    const targetIndex = children.indexOf(target);
    if (dragOverIndex === targetIndex) return;
    dragOverIndex = targetIndex;
    // Move indicator
    if (dragStartIndex < targetIndex) {
      grid.insertBefore(draggingElement, target.nextSibling);
    } else {
      grid.insertBefore(draggingElement, target);
    }
  }

  function handleDragEnd(e) {
    this.classList.remove('dragging');
    draggingElement = null;
    dragStartIndex = null;
    dragOverIndex = null;
    saveOrder();
  }

  function initDrag() {
    const cards = document.querySelectorAll('.module-card');
    cards.forEach(card => {
      card.addEventListener('dragstart', handleDragStart);
      card.addEventListener('dragover', handleDragOver);
      card.addEventListener('dragend', handleDragEnd);
      // Prevent default drag image
      card.addEventListener('drag', e => e.preventDefault());
    });
  }

  loadOrder();
  initDrag();
})();
