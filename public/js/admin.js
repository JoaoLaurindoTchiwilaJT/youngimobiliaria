document.addEventListener('DOMContentLoaded', () => {
  const mobileBtn = document.querySelector('.header__mobile-btn');
  const nav = document.querySelector('.nav');
  const navLinks = document.querySelectorAll('.nav__link');
  const sections = document.querySelectorAll('.section');
  const btnCadastrar = document.getElementById('cadastrarBtn');
  const modal = document.getElementById('formModal');
  const modalClose = modal.querySelector('.modal__close');
  const modalOverlay = modal.querySelector('.modal__overlay');

  // Campos do formulário
  const tipoSelect = document.getElementById('tipoServico');
  const roomsGroup = document.querySelector('.form__group--rooms');
  const zoneGroup = document.querySelector('.form__group--zone');

  // Mobile menu toggle
  mobileBtn.addEventListener('click', () => nav.classList.toggle('active'));

  // Navegação entre seções
  navLinks.forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();
      navLinks.forEach(l => l.classList.remove('nav__link--active'));
      link.classList.add('nav__link--active');
      const target = link.dataset.target;
      sections.forEach(sec => {
        sec.id === target
          ? sec.classList.add('section--active')
          : sec.classList.remove('section--active');
      });
      if (nav.classList.contains('active')) nav.classList.remove('active');
    });
  });

  // Exibir/ocultar campos Quartos/Banheiros ou Zona
  tipoSelect.addEventListener('change', () => {
    if (tipoSelect.value === 'terreno') {
      roomsGroup.style.display = 'none';
      zoneGroup.style.display = 'flex';
    } else {
      roomsGroup.style.display = 'flex';
      zoneGroup.style.display = 'none';
    }
  });

  // Modal de cadastro
  const toggleModal = () => modal.classList.toggle('active');
  btnCadastrar.addEventListener('click', toggleModal);
  modalClose.addEventListener('click', toggleModal);
  modalOverlay.addEventListener('click', toggleModal);
  const fotoInput = document.getElementById('foto');
const previewImg = document.getElementById('previewPhoto');

fotoInput.addEventListener('change', () => {
  const file = fotoInput.files[0];
  if (!file) return previewImg.style.display = 'none';

  const reader = new FileReader();
  reader.onload = e => {
    previewImg.src = e.target.result;
    previewImg.style.display = 'block';
  };
  reader.readAsDataURL(file);
});


});