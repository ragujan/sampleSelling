let nlinks = document.querySelectorAll('.navlinks')
let upBTN = document.getElementById('uploadbutton')
let upBTN2 = document.getElementById('uploadbutton2')
let sampleType = document.getElementById('sampleType')
let uploadFilesOnly = document.getElementById('uploadFileOnly')
let uploadAudioOnly = document.getElementById('uploadAudioOnly')
let uploadImageOnly = document.getElementById('uploadImageOnly')

function sanitizerInput(data){
  const div = document.createElement('div');
  div.textContent = data;
  return div.innerHTML;
}


window.addEventListener('load', async () => {
  //  let val = 0

  let form = new FormData()
  // form.append('PG', val)
  let url = '../showsamples/sampletypeMelody.php'
  let abc = await fetch(url, { body: form, method: 'POST' })
    .then((response) => response.text())
    .then((text) => {
      let samplebox2 = document.getElementById('showmelodysamples')
      let sanitizeData  = sanitizerInput(text);
      console.log(sanitizeData);
      samplebox2.innerHTML= text;
      
    })

  let url2 = '../showsamples/sampletypeDrums.php'
  let def = await fetch(url2, { body: form, method: 'POST' })
    .then((response) => response.text())
    .then((text) => {
      let samplebox2 = document.getElementById('showdrumsamples')
      samplebox2.innerHTML = text
    })

   console.log(form); 
})
async function loadwin() {
  let val = 1

  let form = new FormData()
  form.append('PG', val)
  let url = 'SampleSellingPaginationMelodies.php'
  let abc = await fetch(url, { body: form, method: 'POST' })
    .then((response) => response.text())
    .then((text) => {
      let samplebox2 = document.getElementById('showmelodysamples')
      samplebox2.innerHTML = text
    })

  let url2 = 'samplesellingpaginationdrums.php'
  let def = await fetch(url2, { body: form, method: 'POST' })
    .then((response) => response.text())
    .then((text) => {
      let samplebox2 = document.getElementById('showdrumsamples')
      samplebox2.innerHTML = text
    })
}
function showsubsamples() {
  let val = 0
  let sampleselect = document.getElementById('subSampleMelodyID').value

  let form = new FormData()
  if (sampleselect !== 'ALL') {
    form.append('SSTN', sampleselect)
  }
  form.append('PG', val)

  let url = '../showsamples/sampletypeMelody.php'
  fetch(url, { body: form, method: 'POST' })
    .then((response) => response.text())
    .then((text) => {
      let samplebox = document.getElementById('showmelodysamples')
      samplebox.innerHTML = text;
    })
}

function showsubsamplesdrums() {
  let val = 0
  let sampleselect = document.getElementById('subSampleDrumID').value

  let form = new FormData()
  form.append('PG', val)
  if (sampleselect !== 'ALL') {
    form.append('SSTN', sampleselect)
  }

  let url = '../showsamples/sampletypeDrums.php'
  fetch(url, { body: form, method: 'POST' })
    .then((response) => response.text())
    .then((text) => {
      let samplebox = document.getElementById('showdrumsamples')
      samplebox.innerHTML = text
    })
}

function nextfunctionmelody(x, y) {
  let sampleContainer = document.getElementById('thesamplecontainer1')
  // sampleContainer.scrollIntoView()
  console.log(x, y)
  let val = x
  let sampleselect = y
  let form = new FormData()

  if (y !== null) {
    form.append('SSTN', sampleselect)
  } else {
    alert('hey')
  }

  form.append('PG', val)

  let url = '../showsamples/sampletypeMelody.php'
  fetch(url, { body: form, method: 'POST' })
    .then((response) => response.text())
    .then((text) => {
      let samplebox = document.getElementById('showmelodysamples')
      samplebox.innerHTML = text
    })
}
function nextfunctiondrums(x, y) {
  let sampleContainer = document.getElementById('thesamplecontainer1')
  // sampleContainer.scrollIntoView()
  console.log(x, y)
  let val = x
  let sampleselect = y
  let form = new FormData()

  if (y !== null) {
    form.append('SSTN', sampleselect)
  } else {
    alert('hey')
  }

  form.append('PG', val)

  let url = '../showsamples/sampletypeDrums.php'
  fetch(url, { body: form, method: 'POST' })
    .then((response) => response.text())
    .then((text) => {
      let samplebox = document.getElementById('showdrumsamples')
      samplebox.innerHTML = text
    })
}

function nextfunctionsearch(x, y) {
  let val = x
  let sampleselect = y
  let form = new FormData()

  if (y !== null) {
    form.append('searchText', sampleselect)
  }

  form.append('PG', val)

  let url = '../showsamples/bySearch.php'
  fetch(url, { body: form, method: 'POST' })
    .then((response) => response.text())
    .then((text) => {
      let mainsampleBox = document.getElementById('mainsampleDiv')

      let samplebox = document.getElementById('showmelodySearchsamples')
      samplebox.innerHTML = text
    })
}

function playmusic(x) {
  let playmusicicon = document.getElementById('playmusic' + x)
  let pausemusicicon = document.getElementById('pausemusic' + x)

  let music = document.getElementById('audio' + x)
  pausemusicicon.classList.toggle('d-none')
  playmusicicon.classList.toggle('d-none')
  music.play()
}

function pausemusic(x) {
  let playmusicicon = document.getElementById('playmusic' + x)
  let pausemusicicon = document.getElementById('pausemusic' + x)
  let music = document.getElementById('audio' + x)
  pausemusicicon.classList.toggle('d-none')
  playmusicicon.classList.toggle('d-none')
  music.pause()
}

function viewbuy(x) {
  window.location = '../viewsingleproduct/viewsingleproduct.php?X=' + x
}
let searchButton = document.getElementById('searchButton')

searchButton.addEventListener('click', () => {
  let sBox = document.getElementById('searchBox')
  let form = new FormData()
  form.append('searchText', sBox.value)
  let url = '../showsamples/bySearch.php'
  fetch(url, { body: form, method: 'POST' })
    .then((response) => response.text())
    .then((text) => {
      let mainsampleBox = document.getElementById('mainsampleDiv')
      mainsampleBox.innerHTML =" ";
      mainsampleBox.classList.add('d-none')
      let samplebox = document.getElementById('showmelodySearchsamples')
      samplebox.innerHTML = text
    })
})

