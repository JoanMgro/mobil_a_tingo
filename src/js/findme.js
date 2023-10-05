
const inputCoords = document.querySelector('#my-coords');
const inputBoundingBox = document.querySelector('#bounding-box');
const RAD_TIERRA = 6378;

const latitudeRange = (latitude, distanceKm) =>{
    let deltaLat = (distanceKm/RAD_TIERRA) * (180/Math.PI);
    return Array(latitude + deltaLat, latitude - deltaLat);
};

const longitudeRange = (longitude, latitude, distanceKm)=>{
  let deltaLong = ((distanceKm/RAD_TIERRA) * (180/Math.PI))/Math.cos(latitude*Math.PI/180);
  return Array(longitude + deltaLong, longitude - deltaLong);

};





  // document.querySelector("#find-me").addEventListener("click", (e) => {
  //   e.preventDefault();
  //   let boundingBox =[];
  //   let myPos =[];


    
  //     navigator.geolocation.getCurrentPosition((pos) => {
  //       myPos.push(pos.coords.latitude);
  //       myPos.push(pos.coords.longitude);
  //       inputCoords.value = JSON.stringify(myPos);
  //       console.log(pos.coords);   
        
  //     //console.log(`latitud: ${pos.coords.latitude}, longitud ${pos.coords.longitude}`);
  //       boundingBox.push(latitudeRange(pos.coords.latitude, radioSelected));
  //       boundingBox.push(longitudeRange(pos.coords.longitude,boundingBox[0][0], radioSelected));

  //   }, (err) => {
  //       console.log('uppa. no sirvio');

  //   }, {enableHighAccuracy: true});
  //    // inputCoords.value = myPos;
  //   // inputBoundingBox.value = JSON.stringify(boundingBox);
  //   // console.log(inputCoords.value);
    
  // });
  