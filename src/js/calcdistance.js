 
 const distance = (lat, long, lat2, long2)=>{
  
    // The math module contains a function
   // named toRadians which converts from
   // degrees to radians.
   long =  long * Math.PI / 180;
   long2 = long2 * Math.PI / 180;
   lat = lat * Math.PI / 180;
   lat2 = lat2 * Math.PI / 180;

   // Haversine formula
   let dlon = long2 - long;
   let dlat = lat2 - lat;

   let a = Math.pow(Math.sin(dlat / 2), 2)
            + Math.cos(lat) * Math.cos(lat2)
            * Math.pow(Math.sin(dlon / 2),2);
          
   let c = 2 * Math.asin(Math.sqrt(a));

   // Radius of earth in kilometers. Use 3956
   // for miles
   let r = 6371;

   // calculate the result
   return(c * r);

}
