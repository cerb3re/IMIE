package com.moventes.com.imdb;

import android.arch.persistence.room.Room;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Handler;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.ImageView;
import android.widget.TextView;

import com.nostra13.universalimageloader.core.ImageLoader;

import org.json.JSONException;

import java.io.IOException;
import java.util.concurrent.ExecutionException;

public class DetailsActivity extends AppCompatActivity {

    Movie movie;

    AppDatabase db;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.details_activity);

        db = Room.databaseBuilder(getApplicationContext(),
                AppDatabase.class, "database-name").build();

        ImageView poster = findViewById(R.id.poster);
        TextView title = findViewById(R.id.title);
        TextView year = findViewById(R.id.year);
        TextView director = findViewById(R.id.director);
        TextView actors = findViewById(R.id.actors);
        TextView plot = findViewById(R.id.plot);

        MovieAccessor accessor = new MovieAccessor();
        movie = null;

        final String id = getIntent().getStringExtra("MOVIE_ID");

        try {
            movie = accessor.getMovieById(id);
        } catch (ExecutionException | InterruptedException | IOException | JSONException e) {
            e.printStackTrace();
        }

        ImageLoader.getInstance().displayImage(movie.getPoster(), poster);
        title.setText(movie.getTitle());
        year.setText(movie.getYear());
        director.setText(movie.getDirector());
        actors.setText(movie.getActors());
        plot.setText(movie.getPlot());

        final CheckBox addToList = findViewById(R.id.add_to_list);

        try {
            boolean foundFilm = new CheckFilmTask().execute(id).get();
            addToList.setChecked(foundFilm);
        } catch (InterruptedException e) {
            e.printStackTrace();
        } catch (ExecutionException e) {
            e.printStackTrace();
        }



        addToList.setOnCheckedChangeListener(
                new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton compoundButton,
                                         final boolean checked) {
                new Thread() {
                    @Override
                    public void run() {
                        if (checked) {
                            db.movieDao().addMovie(movie);
                        } else {
                            db.movieDao().removeMovie(movie);
                        }
                    }
                }.start();
            }
        });
    }

    class CheckFilmTask extends AsyncTask<String, Void, Boolean> {

        @Override
        protected Boolean doInBackground(String... ids) {
            Movie movieInDb = db.movieDao().getMovieById(ids[0]);
            return movieInDb != null;
        }
    }
}
