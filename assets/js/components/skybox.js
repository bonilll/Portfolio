import * as THREE from 'three/build/three.min';
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls"


export const skybox = {
    init: function () {

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 60, 30000);
        camera.position.set(-900, -200, -900);

// start render engine
        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(window.devicePixelRatio);
        document.querySelector(".virtualskybox").appendChild(renderer.domElement);
        // document.body.appendChild(renderer.domElement);

// resize

        window.addEventListener('resize', () => {
            renderer.setSize(window.innerWidth, window.innerHeight);
            camera.aspect = window.innerWidth / window.innerHeight;

            camera.updateProjectionMatrix();
        })

// controls

        const controls = new OrbitControls(camera, renderer.domElement)
        controls.enableDamping = true
        controls.dampingFactor = 0.25
        controls.enableZoom = false

//video material
        let video = document.getElementById('video');
        video.src = "images/newhome/cloth.mp4";
        let videoTexture = new THREE.VideoTexture(video);

// texture material

        let materialArray = [];
        let texture_ft = new THREE.TextureLoader().load('images/newhome/arid2_ft.jpg');
        let texture_bk = new THREE.TextureLoader().load('images/newhome/arid2_bk.jpg');
        let texture_up = new THREE.TextureLoader().load('images/newhome/arid2_up.jpg');
        let texture_dn = new THREE.TextureLoader().load('images/newhome/arid2_dn.jpg');
        let texture_rt = new THREE.TextureLoader().load('images/newhome/arid2_lf.jpg');
        let texture_lf = new THREE.TextureLoader().load('images/newhome/arid2_rt.jpg');

        materialArray.push(new THREE.MeshBasicMaterial({map: texture_ft}));
        materialArray.push(new THREE.MeshBasicMaterial({map: texture_bk}));
        materialArray.push(new THREE.MeshBasicMaterial({map: texture_up}));
        materialArray.push(new THREE.MeshBasicMaterial({map: texture_dn}));
        materialArray.push(new THREE.MeshBasicMaterial({map: texture_rt}));
        materialArray.push(new THREE.MeshBasicMaterial({map: texture_lf}));

        video.play();

        for (let i = 0; i < 6; i++)
            materialArray[i].side = THREE.BackSide;
        let skyboxGeo = new THREE.BoxGeometry(10000, 10000, 10000);
        let skybox = new THREE.Mesh(skyboxGeo, materialArray);
        scene.add(skybox);
        animate();

        function animate() {
            renderer.render(scene, camera);
            requestAnimationFrame(animate);
        }

    }
};