@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Abe Keishi</h6>
                                <h2 class="text-white mb-0">G's Creative Garage 登壇用動画</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
                        <video width="100%" controls autoplay poster="https://vod-streaming-backet.s3-ap-northeast-1.amazonaws.com/assets/b399ca31-eaa2-4ffa-9363-220a3e883408/Thumbnails/gs_creative_garage_no4.0000002.jpg" id="hls-video"></video>
                        <script>
                            let video = document.getElementById('hls-video');
                            if(Hls.isSupported()) {
                                let hls = new Hls();
                                hls.loadSource('https://d19xfurn3k798o.cloudfront.net/assets/b399ca31-eaa2-4ffa-9363-220a3e883408/HLS/gs_creative_garage_no4.m3u8');
                                hls.attachMedia(video);
                                hls.on(Hls.Events.MANIFEST_PARSED,function() {
                                video.stop();
                            });
                            }
                            else if (video.canPlayType('application/vnd.apple.mpegurl')) {
                                video.src = 'https://d19xfurn3k798o.cloudfront.net/assets/b399ca31-eaa2-4ffa-9363-220a3e883408/HLS/gs_creative_garage_no4.m3u8';
                                video.addEventListener('loadedmetadata',function() {
                                // video.play();
                                });
                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">動画のちょっと解説</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">この動画はネットワーク速度に応じて、自動的に360p~720pに画質が変動するマルチビットレートに対応しています。<br />
                            Developer Toolsでネットワーク速度を低速にすると画質が低下することがわかると思います。</p>
                        <p class="card-text"><small class="text-muted">Last updated 4 hours ago</small></p>
                    </div>
                </div>
                <div class="card shadow mt-4">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">登壇資料</h3>
                            </div>
                            <div class="col text-right">
                                <button id="js-open-all-resume" class="btn btn-sm btn-primary">Open All Links</button>
                                <script>
                                    document.getElementById('js-open-all-resume').addEventListener('click', ()=>{
                                        document.querySelectorAll('.opened-link').forEach(i => {
                                            let childWindow = window.open('about:blank');
                                            childWindow.location.href = i.href;
                                            childWindow = null;
                                        })
                                    })
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush" id="table-link  ">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">資料リンク</th>
                                    <th scope="col">作成進捗</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <a class="opened-link" href="https://speakerdeck.com/">登壇資料PDF</a> 
                                    </th>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">100%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <a class="opened-link" href="https://github.com/TanisukeGoro/aws-vod-streaming-tutorial">チュートリアル Github</a> 
                                    </th>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">60%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <a class="opened-link" href="https://github.com/TanisukeGoro/aws-vod-streaming-tutorial/wiki">Wiki Github</a> 
                                    </th>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">0%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
            </div>
            <div class="col-xl-4">
            </div>
        </div>     
    </div>
@endsection

@push('js')
    <script src="{{ secure_asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ secure_asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush