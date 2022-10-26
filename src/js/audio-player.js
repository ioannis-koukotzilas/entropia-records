/*
 *	ACF Audio Player
 *
 *	Copyright (c) Monoscopic Studio
 *
 *	License: CC-BY-NC-4.0
 *	http://creativecommons.org/licenses/by-nc/4.0/
 */

class AudioTrack {
  constructor(track_element) {
    this.el = track_element;
    this.src = track_element.getAttribute('data-audio');
  }
}

class AudioPlayer {
  constructor(player_element) {
    // the current player element
    this.player_el = player_element;

    // track list
    this.tracks = [];

    // when the playlist ends, should we continue playing from the start?
    this.continue_on_playlist_end = false;

    // bound track_clicked
    this.on_track_clicked_bind = this.on_track_clicked.bind(this);
    this.on_play_clicked_bind = this.on_play_clicked.bind(this);
    this.on_timebar_clicked_bind = this.on_timebar_clicked.bind(this);

    // create the audio element
    this.audio_el = document.createElement('audio');
    this.player_el.appendChild(this.audio_el);

    // audio bind
    this.audio_el.preload = 'metadata';
    this.audio_el.ontimeupdate = this.ap_timeupdate.bind(this);
    this.audio_el.onloadedmetadata = this.ap_loadedmetadata.bind(this);
    this.audio_el.onpause = this.ap_pause.bind(this);
    this.audio_el.onplay = this.ap_play.bind(this);
    this.audio_el.onended = this.ap_onended.bind(this);

    this.progress_el = this.player_el.getElementsByClassName('audio-player-progress')[0];

    this.play_btn_el = this.player_el.getElementsByClassName('audio-player-play-btn')[0];
    this.play_btn_el.addEventListener('click', this.on_play_clicked_bind);

    this.timebar_el = this.player_el.getElementsByClassName('audio-player-timebar')[0];
    this.timebar_el.addEventListener('click', this.on_timebar_clicked_bind);

    // set the current track to invalid
    this.current_track = -1;

    // setup the tracks
    var track_els = this.player_el.getElementsByClassName('audio-track');
    var track_index = 0;
    for (var track_el of track_els) {
      track_el.setAttribute('data-track-index', track_index++);
      this.tracks.push(new AudioTrack(track_el));
      track_el.addEventListener('click', this.on_track_clicked_bind);
    }

    // initialize the current track
    this.set_track(0);
    this.update_play_state();
    // TODO: event delegates for audio changed
  }

  create_timestring_from_seconds(time) {
    time = Math.floor(time);
    let seconds = time % 60;
    let minutes = Math.floor(time / 60);

    return minutes.toString() + ':' + seconds.toString().padStart(2, '0');
  }

  get_play_time_el() {
    return this.player_el.getElementsByClassName('audio-player-play-time')[0];
  }

  get_duration_el() {
    return this.player_el.getElementsByClassName('audio-player-duration')[0];
  }

  on_track_clicked(event) {
    var track_el = event.currentTarget;
    var track_index = track_el.getAttribute('data-track-index');
    this.set_track(track_index);

    if (this.audio_el.paused) {
      this.audio_el.play();
    } else {
      this.audio_el.pause();
    }
  }

  clear_track_selection() {
    for (var track of this.tracks) {
      track.el.classList.remove('audio-track-selected');
    }
  }

  set_track(track_index) {
    track_index = parseInt(track_index);
    if (track_index != this.current_track) {
      this.current_track = track_index;
      this.audio_el.src = this.tracks[track_index].src;
      this.clear_track_selection();
      this.tracks[track_index].el.classList.add('audio-track-selected');

      this.audio_el.load();
    }
  }

  play_next_track() {
    let next_track = this.current_track + 1;

    while (next_track >= this.tracks.length) {
      next_track -= this.tracks.length;
    }

    this.set_track(next_track);
    if (next_track != 0 || (next_track == 0 && this.continue_on_playlist_end)) {
      this.audio_el.play();
    }
  }

  set_play_percentage(percent) {
    this.progress_el.style.width = percent * 100.0 + '%';
  }

  on_play_clicked(event) {
    if (this.audio_el.paused) {
      this.audio_el.play();
    } else {
      this.audio_el.pause();
    }
    this.update_play_state();
  }

  update_play_state() {
    if (!this.audio_el.paused) {
      this.player_el.classList.remove('audio-player-paused');
    } else {
      this.player_el.classList.add('audio-player-paused');
    }
  }

  clamp(num, min, max) {
    return Math.max(min, Math.min(max, num));
  }

  on_timebar_clicked(event) {
    let mouseX = event.pageX;
    let bounding_rect = this.timebar_el.getBoundingClientRect();
    let relativeX = mouseX - bounding_rect.left;
    let percentage = relativeX / bounding_rect.width;

    percentage = this.clamp(percentage, 0.0, 1.0);
    this.set_seek_percentage(percentage);
  }

  set_seek_percentage(percent) {
    this.audio_el.currentTime = percent * this.audio_el.duration;
  }

  /**
   * Player events - start
   */

  ap_timeupdate() {
    let timestring = this.create_timestring_from_seconds(this.audio_el.currentTime);
    this.get_play_time_el().innerHTML = timestring;

    let percentage = this.audio_el.currentTime / this.audio_el.duration;
    percentage = this.clamp(percentage, 0.0, 1.0);
    this.set_play_percentage(percentage);
  }

  ap_loadedmetadata() {
    let timestring = this.create_timestring_from_seconds(this.audio_el.duration);
    this.get_duration_el().innerHTML = timestring;

    this.ap_timeupdate();
  }

  ap_pause() {
    this.update_play_state();
  }

  ap_play() {
    this.update_play_state();
  }

  ap_onended() {
    this.play_next_track();
  }
}

var players = [];

document.addEventListener('DOMContentLoaded', (event) => {
  var player_els = document.getElementsByClassName('audio-player');
  for (var player_el of player_els) {
    players.push(new AudioPlayer(player_el));
  }
});
