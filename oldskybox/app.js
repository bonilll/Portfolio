// let scene, camera, renderer;
//
// function init() {
//     scene = new THREE.Scene();
//     camera = new THREE.PerspectiveCamera(55, window.innerWidth / window.innerHeight, 65, 30000);
//     camera.position.set(0, -3, 0);
//     // camera.rotation.set(0, 90, 0);
//     // camera.lookAt(scene.position);
//
//     renderer = new THREE.WebGLRenderer({
//         antialias: true
//     });
//     renderer.setSize(window.innerWidth, window.innerHeight);
//     document.body.appendChild(renderer.domElement);
//
//     window.addEventListener('resize', function() {
//         var width = window.innerWidth;
//         var height = window.innerHeight;
//         renderer.setSize(width, height);
//
//         camera.aspect = width / height;
//         camera.updateProjectionMatrix();
//     });
//
//     let controls = new THREE.OrbitControls(camera);
//     controls.addEventListener('change', renderer);
//     controls.minDistance = 1350;
//     controls.maxDistance = 1350;
//     // // camera.autoRotate = true;
//     // controls.update();
//     // // camera.autoRotateSpeed = 2.0;
//     // // controls.update();
//     // // camera.lookAt(scene.position);
//
//     let materialArray = [];
//     let texture_ft = new THREE.TextureLoader().load('u_lf.jpg');
//     let texture_bk = new THREE.TextureLoader().load('u_rg.jpg');
//     let texture_up = new THREE.TextureLoader().load('u_up.jpg');
//     let texture_dn = new THREE.TextureLoader().load('u_dn.jpg');
//     let texture_rt = new THREE.TextureLoader().load('u_bk.jpg');
//     let texture_lf = new THREE.TextureLoader().load('u_ft.jpg');
//
//     materialArray.push(new THREE.MeshBasicMaterial({
//         map: texture_ft
//     }));
//     materialArray.push(new THREE.MeshBasicMaterial({
//         map: texture_bk
//     }));
//     materialArray.push(new THREE.MeshBasicMaterial({
//         map: texture_up
//     }));
//     materialArray.push(new THREE.MeshBasicMaterial({
//         map: texture_dn
//     }));
//     materialArray.push(new THREE.MeshBasicMaterial({
//         map: texture_rt
//     }));
//     materialArray.push(new THREE.MeshBasicMaterial({
//         map: texture_lf
//     }));
//     // material.side = THREE.BackSide
//     for (let i = 0; i < 6; i++)
//         materialArray[i].side = THREE.BackSide;
//     let skyboxGeo = new THREE.BoxGeometry(10000, 10000, 10000)
//
//     let skybox = new THREE.Mesh(skyboxGeo, materialArray);
//     // skybox.scale.x = -1;
//     scene.add(skybox);
//     animate();
// }
//
// function animate() {
//
//     requestAnimationFrame(animate);
//     render();
//     renderer.render(scene, camera);
// }
//
// function render() {
//     //using timer as animation
//     var speed = Date.now() * 0.00005;
//
//     camera.position.x = Math.cos(speed) * 50;
//     camera.position.z = Math.sin(speed) * 50;
//
//
//     camera.lookAt(scene.position); //0,0,0
//     renderer.render(scene, camera);
// }
// init();
// animate();

//
// const mouse = new THREE.Vector2();
// const target = new THREE.Vector2();
// const windowHalf = new THREE.Vector2( window.innerWidth / 1000, window.innerHeight / 1000 );
//
// init();
// animate();
//
// function init() {
//
//     camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 0.1, 500 );
//     camera.position.z = 50;
//
//     scene = new THREE.Scene();
//
//     const geometry = new THREE.BoxBufferGeometry();
//     const material = new THREE.MeshNormalMaterial();
//
//     for ( let i = 0; i < 1000; i ++ ) {
//
//         const object = new THREE.Mesh( geometry, material );
//         object.position.x = Math.random() * 80 - 40;
//         object.position.y = Math.random() * 80 - 40;
//         object.position.z = Math.random() * 80 - 40;
//         object.rotation.x = Math.random() * 2 * Math.PI;
//         object.rotation.y = Math.random() * 2 * Math.PI;
//         object.rotation.z = Math.random() * 2 * Math.PI;
//         scene.add( object );
//
//     }
//
//     renderer = new THREE.WebGLRenderer( { antialias: true } );
//     renderer.setSize( window.innerWidth, window.innerHeight );
//     document.body.appendChild( renderer.domElement );
//
//     document.addEventListener( 'mousemove', onMouseMove, false );
//     document.addEventListener( 'wheel', onMouseWheel, false );
//     window.addEventListener( 'resize', onResize, false );
//
// }
//
// function onMouseMove( event ) {
//
//     mouse.x = ( event.clientX - windowHalf. x);
//     mouse.y = ( event.clientY - windowHalf.x);
//
// }
//
// function onMouseWheel( event ) {
//
//     camera.position.z += event.deltaY * 0.1; // move camera along z-axis
//
// }
//
// function onResize( event ) {
//
//     const width = window.innerWidth;
//     const height = window.innerHeight;
//
//     windowHalf.set( width / 2, height / 2 );
//
//     camera.aspect = width / height;
//     camera.updateProjectionMatrix();
//     renderer.setSize( width, height );
//
// }
//
// function animate() {
//
//     target.x = ( 1 - mouse.x ) * 0.002;
//     target.y = ( 1 - mouse.y ) * 0.002;
//
//     camera.rotation.x += 0.002 * ( target.y - camera.rotation.x );
//     camera.rotation.y += 0.002 * ( target.x - camera.rotation.y );
//
//     requestAnimationFrame( animate );
//     renderer.render( scene, camera );
//
// }

// Static

let scene, camera, renderer;

const mouse = new THREE.Vector2();

const target = new THREE.Vector2();
const windowHalf = new THREE.Vector2( window.innerWidth / 2, window.innerHeight / 2 );

function init() {



    scene = new THREE.Scene();
    camera = new THREE.PerspectiveCamera(60,window.innerWidth/window.innerHeight,135,30000);
    camera.position.set(-900,-200,-900);


    renderer = new THREE.WebGLRenderer({antialias:true});
    renderer.setSize(window.innerWidth,window.innerHeight);
    document.body.appendChild(renderer.domElement);
    document.addEventListener( 'mousemove', onMouseMove, false );
    window.addEventListener( 'resize', onResize, false );

    let materialArray = [];
    let texture_ft = new THREE.TextureLoader().load('ustadio/u_lf.jpg');
    texture_ft.wrapS = THREE.RepeatWrapping;
    texture_ft.repeat.x = - 1;

    let texture_bk = new THREE.TextureLoader().load('ustadio/u_rg.jpg');
    texture_bk.wrapS = THREE.RepeatWrapping;
    texture_bk.repeat.x = - 1;

    let texture_up = new THREE.TextureLoader().load('ustadio/u_up.jpg');
    texture_up.wrapS = THREE.RepeatWrapping;
    texture_up.repeat.x = - 1;

    let texture_dn = new THREE.TextureLoader().load('ustadio/u_dn.jpg');
    texture_dn.wrapS = THREE.RepeatWrapping;
    texture_dn.repeat.x = - 1;

    let texture_rt = new THREE.TextureLoader().load('ustadio/u_ft.jpg');
    texture_rt.wrapS = THREE.RepeatWrapping;
    texture_rt.repeat.x = - 1;

    let texture_lf = new THREE.TextureLoader().load('ustadio/u_bk.jpg');
    texture_lf.wrapS = THREE.RepeatWrapping;
    texture_lf.repeat.x = - 1;

    materialArray.push(new THREE.MeshBasicMaterial( { map: texture_ft }));
    materialArray.push(new THREE.MeshBasicMaterial( { map: texture_bk }));
    materialArray.push(new THREE.MeshBasicMaterial( { map: texture_up }));
    materialArray.push(new THREE.MeshBasicMaterial( { map: texture_dn }));
    materialArray.push(new THREE.MeshBasicMaterial( { map: texture_rt }));
    materialArray.push(new THREE.MeshBasicMaterial( { map: texture_lf }));

    for (let i = 0; i < 6; i++)
        materialArray[i].side = THREE.BackSide;
    let skyboxGeo = new THREE.BoxGeometry( 10000, 10000, 10000);
    let skybox = new THREE.Mesh( skyboxGeo, materialArray );
    skybox.rotation.reorder('YXZ')
    skybox.rotation.set(0,3.25,0);
    // skybox.scale.x = -1;




    scene.add( skybox );
    animate();


}

function onMouseMove( event ) {

console.log(mouse);
    mouse.x = ( event.clientX - windowHalf.x );
    mouse.y = ( event.clientY - windowHalf.x );

}

function onResize( event ) {

    const width = window.innerWidth;
    const height = window.innerHeight;

    windowHalf.set( width / 2, height / 2 );

    camera.aspect = width / height;
    camera.updateProjectionMatrix();
    renderer.setSize( width, height );

}

function animate() {

    target.x = ( 1 - mouse.x ) * 0.002;
    target.y = ( 1 - mouse.y ) * 0.002;

    camera.rotation.x += 0.0002 * ( target.y - camera.rotation.x );
    camera.rotation.y += 0.0002 * ( target.x - camera.rotation.y );

    requestAnimationFrame( animate );
    renderer.render( scene, camera );
}

init();
animate();
























//
//
//
// import * as THREE from 'https://cdn.jsdelivr.net/npm/three@0.122/build/three.module.js';
//
// let camera, scene, renderer;
//
// const mouse = new THREE.Vector2();
// const target = new THREE.Vector2();
// const windowHalf = new THREE.Vector2( window.innerWidth / 2, window.innerHeight / 2 );
//
// init();
// animate();
//
// function init() {
//
//     camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 0.1, 500 );
//     camera.position.z = 50;
//
//     scene = new THREE.Scene();
//
//     const geometry = new THREE.BoxBufferGeometry();
//     const material = new THREE.MeshNormalMaterial();
//
//     for ( let i = 0; i < 1000; i ++ ) {
//
//         const object = new THREE.Mesh( geometry, material );
//         object.position.x = Math.random() * 80 - 40;
//         object.position.y = Math.random() * 80 - 40;
//         object.position.z = Math.random() * 80 - 40;
//         object.rotation.x = Math.random() * 2 * Math.PI;
//         object.rotation.y = Math.random() * 2 * Math.PI;
//         object.rotation.z = Math.random() * 2 * Math.PI;
//         scene.add( object );
//
//     }
//
//     renderer = new THREE.WebGLRenderer( { antialias: true } );
//     renderer.setSize( window.innerWidth, window.innerHeight );
//     document.body.appendChild( renderer.domElement );
//
//     document.addEventListener( 'mousemove', onMouseMove, false );
//     document.addEventListener( 'wheel', onMouseWheel, false );
//     window.addEventListener( 'resize', onResize, false );
//
// }
//
// function onMouseMove( event ) {
//
//     mouse.x = ( event.clientX - windowHalf.x );
//     mouse.y = ( event.clientY - windowHalf.x );
//
// }
//
// function onMouseWheel( event ) {
//
//     camera.position.z += event.deltaY * 0.1; // move camera along z-axis
//
// }
//
// function onResize( event ) {
//
//     const width = window.innerWidth;
//     const height = window.innerHeight;
//
//     windowHalf.set( width / 2, height / 2 );
//
//     camera.aspect = width / height;
//     camera.updateProjectionMatrix();
//     renderer.setSize( width, height );
//
// }
//
// function animate() {
//
//     target.x = ( 1 - mouse.x ) * 0.002;
//     target.y = ( 1 - mouse.y ) * 0.002;
//
//     camera.rotation.x += 0.001 * ( target.y - camera.rotation.x );
//     camera.rotation.y += 0.001 * ( target.x - camera.rotation.y );
//
//     requestAnimationFrame( animate );
//     renderer.render( scene, camera );
//
// }