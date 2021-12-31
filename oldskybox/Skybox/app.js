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



// Static

let scene, camera, renderer;
function init() {
    scene = new THREE.Scene();
    camera = new THREE.PerspectiveCamera(55,window.innerWidth/window.innerHeight,45,30000);
    camera.position.set(-900,-200,-900);
    renderer = new THREE.WebGLRenderer({antialias:true});
    renderer.setSize(window.innerWidth,window.innerHeight);
    document.body.appendChild(renderer.domElement);
    let controls = new THREE.OrbitControls(camera);
    controls.addEventListener('change', renderer);
    controls.minDistance = 1350;
    controls.maxDistance = 1350;

    let materialArray = [];
    let texture_ft = new THREE.TextureLoader().load('u_lf.jpg');
    texture_ft.wrapS = THREE.RepeatWrapping;
    texture_ft.repeat.x = - 1;

    let texture_bk = new THREE.TextureLoader().load('u_rg.jpg');
    texture_bk.wrapS = THREE.RepeatWrapping;
    texture_bk.repeat.x = - 1;

    let texture_up = new THREE.TextureLoader().load('u_up.jpg');
    texture_up.wrapS = THREE.RepeatWrapping;
    texture_up.repeat.x = - 1;

    let texture_dn = new THREE.TextureLoader().load('u_dn.jpg');
    texture_dn.wrapS = THREE.RepeatWrapping;
    texture_dn.repeat.x = - 1;

    let texture_rt = new THREE.TextureLoader().load('u_ft.jpg');
    texture_rt.wrapS = THREE.RepeatWrapping;
    texture_rt.repeat.x = - 1;

    let texture_lf = new THREE.TextureLoader().load('u_bk.jpg');
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
    // skybox.scale.x = -1;

    scene.add( skybox );
    animate();
}
function animate() {
    renderer.render(scene,camera);
    requestAnimationFrame(animate);
}
init();